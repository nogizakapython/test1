//
//
//    血圧記録プログラム
//　　新規作成日  2021/03/19(Ver1.0)
//    作成者　　　乃木坂46好きのITエンジニア
//
//
//
//
//
//

//パッケージの定義
package Ketsuatsu;

//importするAPIを定義
import java.io.FileWriter;
import java.io.IOException;
import java.text.SimpleDateFormat;
import java.util.Date;
import java.util.Scanner;



//標準入力クラス
class top_ketsuatsudata{
	//日付オブジェクトを呼び出す
	//Date d = new Date();
	//日付フォーマットオブジェクトを呼び出す
	//SimpleDateFormat d1 = new SimpleDateFormat("yyyy/MM/dd");
	//文字列型のデータに変換する
	//private String hiduke = d1.format(d);
	//上の血圧
	private int t_blood;
	//下の血圧
	//private int u_blood;
	//ループフラグ
	private boolean flag = false;
	//Scannerオブジェクトを呼び出す
	Scanner sc = new Scanner(System.in);
	//上の血圧を入力するメソッド
  public int t_blood_data() {
  	while ( flag == false) {
  		System.out.println("上の血圧を入力してください");
  		String line1 = sc.nextLine();
  		//例外処理判定
  		try {
  			t_blood = Integer.parseInt(line1);
  			flag = true;

  		//文字列を入力された場合の処理
  		} catch (NumberFormatException e){
  			System.out.println("数値を入力してください");
  		}
  	}
  	return t_blood;

  }
}
class under_ketsuatsudata{
	//下の血圧フィールド
	private int u_blood;
	//ループフラグ
	private boolean flag = false;
	//Scannerオブジェクトを呼び出す
	Scanner sc = new Scanner(System.in);
	//上の血圧を入力するメソッド
	public int u_blood_data() {
	  	while ( flag == false) {
	  		System.out.println("下の血圧を入力してください");
	  		String line2 = sc.nextLine();
	  		//例外処理判定
	  		try {
	  			u_blood = Integer.parseInt(line2);
	  			flag = true;

	  		//文字列を入力された場合の処理
	  		} catch (NumberFormatException e){
	  			System.out.println("数値を入力してください");
	  		}
	  	}
	  	return u_blood;
	}
}
//出力結果クラス
class kekka{
  public static void kekka(int a,int b) {
		//日付オブジェクトを呼び出す
		Date d = new Date();
		//日付フォーマットオブジェクトを呼び出す
		SimpleDateFormat d1 = new SimpleDateFormat("yyyy/MM/dd");
		String c = d1.format(d);
		String msg = "";

		//System.out.println(c);


  	  	//厚生労働省のBMI値の基準でやせすぎ、普通、肥満度を判定する。
		if ((a < 120) && (b < 80)) {
			msg = "Low-blood";
			//System.out.println("低血圧です");
		} else if (((a>=120) && (a<140)) || ((b >= 80) &&( b < 90))) {
			msg = "Normal-Blood";
			//System.out.println("正常血圧です");
		} else if (((a>=140) && (a<160)) || ((b >= 90) &&( b < 100))) {
			msg = "High-blood(First)";
			//System.out.println("高血圧(1度)です");
		}else if (((a>=160) && (a<180)) || ((b >= 100) &&( b < 110))) {
			msg = "High-blood(Second)";
			//System.out.println("高血圧(2度)です");

		} else {
			msg = "High-blood(Critical)";
			//System.out.println("高血圧(3度)です");
		}
  		//ファイルの書き込み処理
		FileWriter fw = null;
		//書き込みエラーが出た場合、書き込みエラーをメッセージ表示する
		try {
			fw = new FileWriter("ketsuatsu.csv",true);
			fw.write(c + "," + a + "," + b + "," + msg + "\n");
			fw.flush();
		} catch (IOException e) {
			System.out.println("ファイル書き込みエラーです");
		} finally {
			//ファイルを閉じる処理。閉じるのに失敗した場合、エラーメッセージを表示する。
			if (fw !=null) {
				try {
					if (fw != null) {
						fw.close();
					}
				} catch(IOException e2) {
					System.out.println("ファイルを閉じるのに失敗しました");
				}
				System.out.println("ファイルの書き込みに成功しました");
			}
		}
	}

}

//メインクラス
public class Ketsuatsu {
	public static void main(String[] args) {
		//上の血圧データオブジェクトを呼び出す
		top_ketsuatsudata t = new top_ketsuatsudata();
		//下の血圧データオブジェクトを呼び出す
		under_ketsuatsudata u = new under_ketsuatsudata();
		//戻り値フィールドを定義する。
		int top_blood;
		int under_blood;
		//上の血圧を返す。
		top_blood = t.t_blood_data();
		//下の血圧を返す。
		under_blood = u.u_blood_data();
		//結果表示メソッドを呼び出す
		//KEKKAオブジェクトを呼び出す。
		kekka k = new kekka();
		k.kekka(top_blood,under_blood);
	}
}
