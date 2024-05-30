import smtplib
import os.path

from email.mime.text import MIMEText

email = input("Digite o endereço de email do destinatário:")
mensagem = input("Digite a mensagem que você quer enviar: ")

if (os.path.isfile("filename")):
    print ("file exists, all went well")
else:
    print ("file not exists, emailing")

    msg = MIMEText(mensagem)

    msg['Subject'] = "Trabalho Marcos e Gustavo"

    #put your host and port here 
    s = smtplib.SMTP_SSL('smtp.gmail.com:465')
    s.login('trabalhoproz81@gmail.com','uxqa ipaq mbxq zqay')
    s.sendmail('trabalhoproz81@gmail.com',email, msg.as_string())
    s.quit()
print ("done")