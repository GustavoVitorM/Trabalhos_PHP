import socket
from ping3 import ping
from scapy.all import IP, ICMP, sr1

class Servidor:

    def __init__(self, endereco="localhost", porta=65432):
        self.endereco = endereco
        self.porta = porta

    def start_serverTCP(self):
        # Criar um socket TCP
        server_socket = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
        
        # Bind do socket a um endereço e porta
        server_address = (self.endereco, self.porta)
        server_socket.bind(server_address)
        
        # Colocar o socket em modo de escuta
        server_socket.listen(1)
        print(f'Servidor ouvindo em {server_address}')
        
        # Aceitar conexões de clientes
        while True:
            connection, client_address = server_socket.accept()
            try:
                print(f'Conexão de {client_address}')
                
                # Receber dados do cliente
                while True:
                    data = connection.recv(1024)
                    if data:
                        print(f'Recebido: {data.decode()}')
                        # Enviar uma resposta de volta ao cliente
                        connection.sendall(data)
                    else:
                        break
            finally:
                connection.close()

    def start_serverUDP(self):
        # Criar um socket UDP
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

    def executeICMP():
        response_time = ping(input("Digite o servidor para pasquisar: "))
        print(f'O tempo de resposta foi: {response_time} segundos')

    def traceroute(self, host, max_hops=30, timeout=2):
        print(f"Traceroute para {host} com um máximo de {max_hops} saltos:")

        for ttl in range(1, max_hops + 1):
            pkt = IP(dst=host, ttl=ttl) / ICMP()
            reply = sr1(pkt, verbose=0, timeout=timeout)

            if reply is None:
                print(f"{ttl}\t*\t(Timed out)")
            elif reply.type == 0:
                print(f"{ttl}\t{reply.src}\t(Destino alcançado)")
                break
            else:
                print(f"{ttl}\t{reply.src}")