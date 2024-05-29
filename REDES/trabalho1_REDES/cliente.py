import socket


class Cliente:

    def __init__(self, endereco="localhost", porta=65432):
        self.endereco = endereco
        self.porta = porta

    def start_clientTCP(self):
        client_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)

        # Conectar o socket a um endereço e porta
        server_address = (self.endereco, self.porta)
        client_socket.connect(server_address)
        
        try:
            # Enviar dados
            message = 'Esta é a mensagem do cliente.'
            client_socket.sendall(message.encode())
            
            # Receber resposta
            data = client_socket.recv(1024)
            print(f'Recebido: {data.decode()}')
        finally:
            client_socket.close()

    def start_clientUDP(self):
        server_socket = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)
    
        # Bind do socket a um endereço e porta
        server_address = (self.endereco, self.porta)
        server_socket.bind(server_address)
        print(f'Servidor UDP ouvindo em {server_address}')
        
        while True:
            data, client_address = server_socket.recvfrom(1024)
            print(f'Recebido {data.decode()} de {client_address}')
            
            if data:
                sent = server_socket.sendto(data, client_address)
                print(f'Enviado {data.decode()} de volta para {client_address}')

        