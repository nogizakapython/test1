def my_generator():
    yield 1
    yield 2
    yield 3

gen = my_generator()

for i in range(3):
    print(next(gen))
