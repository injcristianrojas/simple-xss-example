import SimpleHTTPServer
import SocketServer
from BaseHTTPServer import BaseHTTPRequestHandler

class GetHandler(BaseHTTPRequestHandler):
	
	def do_GET(self):
		self.send_response(200)
		self.end_headers()
		user_agent = str(self.headers['user-agent'])
		print(user_agent)
		self.wfile.write("User-Agent: %s" % user_agent)
		return

if __name__ == '__main__':
	from BaseHTTPServer import HTTPServer
	port = 8000
	server = HTTPServer(('', port), GetHandler)
	address_tuple = server.server_address
	print 'Starting server at http://%s:%s, use <Ctrl-C> to stop' % address_tuple
	server.serve_forever()
