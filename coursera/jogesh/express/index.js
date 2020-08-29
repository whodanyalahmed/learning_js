const express = require('express')
const http = require('http')

const dishRouter = require('./routes/dishRouter')
const dishId = require('./routes/dishId')

const bodyPraser =require('body-parser')
const morgan = require('morgan')

const hostname = 'localhost';
const port = 3000;

const app = express();
app.use(morgan('dev'));
app.use(bodyPraser.json());

app.use('/dishes',dishRouter);

app.use('/dishes/:dishID',dishId);

app.use(express.static(__dirname + '/public'));

app.use((req,res,next) => {
    console.log(req.headers);
    res.statusCode = 200;
    res.setHeader('Content-Type','text/html');
    res.end('<html><body><h1>This is an Express Server </h1></body></html>')
})

const server = http.createServer(app);
server.listen(port,hostname,() => {
    console.log(`Server running  at http:// ${hostname}:${port}`);
})