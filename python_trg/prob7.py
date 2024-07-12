# 課題7
# 「レスポンスなう」に出題するお題を表示します。

def output_answer_title(w_array,count):
    print("--------ここから下にレスポンスなうに出題するお題が表示されます---------")
    for i in range(count):
        print(w_array[i])

def main():
    import random
    array1 = []
    file_path = "レスポンスなうお題一覧.txt"
    with open(file_path,encoding="utf-8",mode="r") as f:
        for line in f:
            line = line.replace("\n","")
            # print(line)
            array1.append(line)
    
    n = 0

    random.shuffle(array1)

    array2 = list(array1)

    output_answer_title(array2,1)


if __name__ == "__main__":       
    main()
