# importa a classe servidor
from servidor import Servidor

# Armazena a classe dentro de "Servidor"
Servidor = Servidor()

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
          "-- 3 -> Traceroute --\n",
          "-- 4 -> ICMP --\n",
          "-- 5 -> Sair --\n", sep="")
    opção = input("Digite uma opção: ")

    # Elid para cada opção
    if opção == "1":
        Servidor.start_serverTCP()
    elif opção == "2":
        Servidor.start_serverUDP()
    elif opção == "3":
        Servidor.traceroute()
    elif opção == "4":
        Servidor.executeICMP()
    elif opção == "5":
        break
    else:
        print("Resposta Inválida!Tente novamente\n\n")

print("-- Obrigado! Volte sempre --")