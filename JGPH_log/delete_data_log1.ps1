#########################################
####   ログ削除処理                   ###
####   新規作成   2026/7/30           ###
####   Author by nogizakapython       ###
#########################################

# カレントディレクトリ一時ファイルの変数定義
$listfile = "example.txt"

# 削除対象ファイルのディレクトリの格納先変数の定義
$logpath = ""

# ログファイルの7日前以前のファイル一覧を出力するファイル名変数の定義
$result_csv = "C:\Users\takao.hattori\OneDrive - Accenture\JGPH_log\filelist.csv"

# 削除対象のファイルの拡張子変数の定義
$file_type = "*.xlsx"

try {
    # カレントディレクトリを$listfile変数に指定したテキストファイルに出力する
    Get-Location > $listfile
    if (-not (Test-Path $listfile)) {
        throw "カレントディレクトリの出力に失敗しました: $listfile が作成されませんでした。"
    }

    # カレントディレクトリ表示コマンドの出力結果を1行ずつ読み込み、「C:\」の行を$logpath変数に代入する
    foreach ($line1 in Get-Content -Path $listfile) {
        if ($line1 -match "C:\\") {
            $logpath = $line1
        }
    }

    # $logpathが空の場合は例外をスロー
    if ([string]::IsNullOrEmpty($logpath)) {
        throw "ログパスの取得に失敗しました。C:\から始まるパスが見つかりませんでした。"
    }

    # カレントディレクトリに移動する
    try {
        Set-Location $logpath -ErrorAction Stop
        Write-Host "カレントディレクトリを移動しました: $logpath"
    } catch {
        throw "ディレクトリの移動に失敗しました: $logpath `n詳細: $_"
    }

    # 基準日（今日から7日前）
    $Threshold = (Get-Date).AddDays(-7)

    # 7日前より古いログファイルを取得
    try {
        $OldLogs = Get-ChildItem -Path $logpath -Filter $file_type -File -ErrorAction Stop |
            Where-Object { $_.LastWriteTime -le $Threshold }
        Write-Host "削除対象ファイル数: $($OldLogs.Count) 件"
    } catch {
        throw "ファイル一覧の取得に失敗しました。`n詳細: $_"
    }

    # 結果をCSVに出力
    try {
        $OldLogs | Select-Object Name | Export-Csv -Path $result_csv -Encoding UTF8 -ErrorAction Stop
        Write-Host "CSVファイルを出力しました: $result_csv"
    } catch {
        throw "CSVファイルの出力に失敗しました: $result_csv `n詳細: $_"
    }

    # CSVファイルを1行ずつ読み込み、最終更新日が7日より前のファイルを削除する
    foreach ($line in Get-Content -Path $result_csv -Encoding UTF8) {
        # $lineの値が「#TYPE Selected.System.IO.FileInfo」かつ「"Name"」でない場合、削除処理を行う
        if ( -not ($line -eq "#TYPE Selected.System.IO.FileInfo") -and (-not ($line -eq '"Name"'))) {
            $line = $line.Replace('"', '')
            $targetFile = Join-Path $logpath $line

            try {
                if (Test-Path $targetFile) {
                    Remove-Item $targetFile -ErrorAction Stop
                    Write-Host "削除しました: $targetFile"
                } else {
                    Write-Warning "削除対象ファイルが見つかりませんでした: $targetFile"
                }
            } catch {
                Write-Error "ファイルの削除に失敗しました: $targetFile `n詳細: $_"
                # 削除失敗は処理を継続（1ファイルの失敗で全体を止めない）
            }
        }
    }

} catch {
    # 致命的なエラーをキャッチしてエラーメッセージを表示
    Write-Error "処理中に致命的なエラーが発生しました。`n詳細: $_"
    exit 1

} finally {
    # 一時ファイルの後処理（存在する場合のみ削除）
    if (Test-Path $listfile) {
        Remove-Item $listfile -ErrorAction SilentlyContinue
        Write-Host "一時ファイルを削除しました: $listfile"
    }
    Write-Host "処理が終了しました。"
}