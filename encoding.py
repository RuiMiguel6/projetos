import base64

# Read the image file
with open('imagem.png', 'rb') as image_file:
    image_data = image_file.read()

# Encode the image data to Base64
base64_data = base64.b64encode(image_data).decode('utf-8')

# Print the Base64 image source
image_src = f'data:image/jpeg;base64,{base64_data}'
print(image_src)

