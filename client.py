import socket
import argparse

parser = argparse.ArgumentParser(description='get imageID')
parser.add_argument('path', type=str,
                    help='string')

args = parser.parse_args()

message = args.path

host = '127.0.0.1'
# port = 5001

server = ('127.0.0.1',5000)

s = socket.socket(socket.AF_INET, socket.SOCK_DGRAM)


message = message.encode('utf-8')
s.sendto(message, server)
data, addr = s.recvfrom(1024)
print (str(data))



