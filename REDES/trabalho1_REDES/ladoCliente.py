# importa a classe servidor
from cliente import Cliente

# Armazena a classe dentro de "Servidor"
Cliente = Cliente()

# Loop infinito para o chat
while True:
    # Inicia a conversa com uma saudação
    print("\n\n\n-------------------------")
    print("---- Seja Bem Vindo! ----")
    print("Você esta acessando o lado do cliente")
    print("Através desse programa será possível\n",
        "testar os protocolos TCP e UDP, abaixo\n",
        "selecione qual você quer testar?\n", sep="")
    # Sequência de opções do chat
    print("-- 1 -> TCP ---\n",
          "-- 2 -> UDP ---\n",
          "-- 3 -> Sair --\n", sep="")
    opção = input("Digite uma opção: ")

    # Elid para cada opção
    if opção == "1":
        Cliente.start_clientTCP()
    elif opção == "2":
        Cliente.start_clientUDP()
    elif opção == "3":
        break
    else:
        print("Resposta Inválida!Tente novamente\n\n")

print("-- Obrigado! Volte sempre --")