
# Create a text file with Japanese content and proper encoding
text_content = "業務自動化の第一歩"

# Write the content to a file using UTF-8 encoding to prevent character corruption
with open("automation_start.txt", "w", encoding="utf-8") as file:
    file.write(text_content)

print("The file 'automation_start.txt' has been created successfully with Japanese text.")
