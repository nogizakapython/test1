
from datetime import date

# Define the file name
file_name = "automation_start.txt"

# Get today's date
today = date.today().isoformat()

# Prepare the text to append
text_to_append = f"{today} 学習開始\n"

# Append the text to the file using UTF-8 encoding
with open(file_name, "a", encoding="utf-8") as file:
    file.write(text_to_append)

print(f"Appended to {file_name}: {text_to_append.strip()}")
