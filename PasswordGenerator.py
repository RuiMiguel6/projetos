import random
import string

def generate_password(length):
    characters = string.ascii_letters + string.digits + string.punctuation
    password = ''.join(random.choice(characters) for _ in range(length))
    return password

def is_strong_password(password):
    has_upper = any(char.isupper() for char in password)
    has_lower = any(char.islower() for char in password)
    has_digit = any(char.isdigit() for char in password)
    has_special = any(char in string.punctuation for char in password)
    return has_upper and has_lower and has_digit and has_special

length = int(input("Enter the desired length of the password: "))
password = generate_password(length)

while not is_strong_password(password):
    password = generate_password(length)

print("Generated Password:", password)

