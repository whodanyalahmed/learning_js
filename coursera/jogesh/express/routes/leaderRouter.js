const express = require('express')
const bodyParser = require('body-parser')

const leaderRouter = express.Router();

leaderRouter.use(bodyParser.json());


// const dishIdRouter = express.Router();

// dishIdRouter.use(bodyParser.json());


leaderRouter.route('/')
.all((req,res,next) => {
    res.statusCode = 200;
    res.setHeader('Content-Type','text/plain');
    next();
})
.get((req,res,next) => {
    res.end("will send all the leaders to you.... from database")
})
.post((req,res,next) => {
    res.end("Will add the leaders: " + req.body.name + 
             ' with details: ' + req.body.description);
})
.put((req,res,next) => {
    res.statusCode = 403;
    res.end("PUT operation not supported...");
})
.delete((req,res,next) => {
    res.end("Deleting all the leaders.... from database")
});


leaderRouter.route('/:leaderId')
.get((req,res,next) => {
    res.end("will send details of the leaders.... "+req.params.leaderId + ' to you.');
})
.post((req,res,next) => {
    res.statusCode = 403;
    res.end("POST operation not supported... /leaders/" + req.params.leaderId);
})
.put((req,res,next) => {
    res.write("updating the leader " + req.params.leaderId);
    res.end("\nThis will update the leader: " + req.body.name + ' with details: ' + req.body.description);
})
.delete((req,res,next) => {
    res.end("Deleting leader: ...." + req.params.leaderId);
});


// module.exports = dishIdRouter;

module.exports = leaderRouter;

