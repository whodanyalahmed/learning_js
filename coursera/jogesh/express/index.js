const express = require('express')
const http = require('http');
const bodyPraser =require('body-parser')
const morgan = require('morgan');

const hostname = 'localhost';
const port = 3000;

const app = express();
app.use(morgan('dev'));
app.use(bodyPraser.json());

app.all('/dishes',(req,res,next) => {
    res.statusCode = 200;
    res.setHeader('Content-Type','text/plain');
    next();
});


app.get('/dishes',(req,res,next) => {
    res.end("will send all the dishes to you.... from database")
});

app.post('/dishes',(req,res,next) => {
    res.end("Will add the dishes: " + req.body.name + 
             ' with details: ' + req.body.description);
});
app.put('/dishes',(req,res,next) => {
    res.statusCode = 403;
    res.end("PUT operation not supported...");
});


app.delete('/dishes',(req,res,next) => {
    res.end("Deleting all the dishes.... from database")
});



app.get('/dishes/:dishID',(req,res,next) => {
    res.end("will send details of the dishe.... "+req.params.dishID + ' to you.')
});

app.post('/dishes/:dishID',(req,res,next) => {
    res.statusCode = 403;
    res.end("POST operation not supported... /dishes/" + req.params.dishID);
});
app.put('/dishes/:dishID',(req,res,next) => {
    res.write("updating the dish " + req.params.dishID);
    res.end("This will update the dish: " + res.body.name + ' with details: ' + req.body.description);
});


app.delete('/dishes/:dishID',(req,res,next) => {
    res.end("Deleting dish: ...." + req.params.dishID);
});


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