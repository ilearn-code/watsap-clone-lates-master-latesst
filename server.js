const WebSocket = require('ws'); // Import the ws library
const server = new WebSocket.Server({ port: 8080 }); // Create a WebSocket server

server.on('connection', (ws) => {
  console.log('New connection established');

  ws.on('message', (message) => {
    console.log(`Received message => ${message}`);

    // Broadcast the message to all clients
    server.clients.forEach((client) => {
      if (client.readyState === WebSocket.OPEN) {
        client.send(message);
      }
    });
  });

  ws.send('Welcome to the WebSocket server!');
});

console.log('WebSocket server is running on ws://localhost:8080');
