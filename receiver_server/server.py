import SimpleHTTPServer
import SocketServer
import urlparse
from BaseHTTPServer import BaseHTTPRequestHandler
from pprint import pprint

class GetHandler(BaseHTTPRequestHandler):
  
  def do_GET(self):
    self.send_response(200)
    self.end_headers()
    param_dict = {}
    path = self.path
    if '?' in path:
      path, tmp = path.split('?', 1)
      param_dict = urlparse.parse_qs(tmp)
    pprint(param_dict)
    self.wfile.write('Data received')
    return

if __name__ == '__main__':
  from BaseHTTPServer import HTTPServer
  port = 8181
  server = HTTPServer(('', port), GetHandler)
  address_tuple = server.server_address
  print 'Starting server at http://%s:%s, use <Ctrl-C> to stop' % address_tuple
  server.serve_forever()
