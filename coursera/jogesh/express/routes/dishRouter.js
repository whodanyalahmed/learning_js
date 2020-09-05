const express = require('express')
const bodyParser = require('body-parser')

const dishRouter = express.Router();

dishRouter.use(bodyParser.json());


// const dishIdRouter = express.Router();

// dishIdRouter.use(bodyParser.json());


dishRouter.route('/')
.all((req,res,next) => {
    res.statusCode = 200;
    res.setHeader('Content-Type','text/plain');
    next();
})
.get((req,res,next) => {
    res.end("will send all the dishes to you.... from database")
})
.post((req,res,next) => {
    res.end("Will add the dishes: " + req.body.name + 
             ' with details: ' + req.body.description);
})
.put((req,res,next) => {
    res.statusCode = 403;
    res.end("PUT operation not supported...");
})
.delete((req,res,next) => {
    res.end("Deleting all the dishes.... from database")
});


dishRouter.route('/:dishID')
.get((req,res,next) => {
    res.end("will send details of the dish.... "+req.params.dishID + ' to you.')
})
.post((req,res,next) => {
    res.statusCode = 403;
    res.end("POST operation not supported... /dishes/" + req.params.dishID);
})
.put((req,res,next) => {
    res.write("updating the dish " + req.params.dishID);
    res.end("This will update the dish: " + res.body.name + ' with details: ' + req.body.description);
})
.delete((req,res,next) => {
    res.end("Deleting dish: ...." + req.params.dishID);
});


// module.exports = dishIdRouter;

module.exports = dishRouter;

