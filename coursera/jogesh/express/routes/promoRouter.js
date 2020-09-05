const express = require('express')
const bodyParser = require('body-parser')

const promoRouter = express.Router();

promoRouter.use(bodyParser.json());


// const dishIdRouter = express.Router();

// dishIdRouter.use(bodyParser.json());


promoRouter.route('/')
.all((req,res,next) => {
    res.statusCode = 200;
    res.setHeader('Content-Type','text/plain');
    next();
})
.get((req,res,next) => {
    res.end("will send all the promotions to you.... from database")
})
.post((req,res,next) => {
    res.end("Will add the promtions: " + req.body.name + 
             ' with details: ' + req.body.description);
})
.put((req,res,next) => {
    res.statusCode = 403;
    res.end("PUT operation not supported...");
})
.delete((req,res,next) => {
    res.end("Deleting all the promotions.... from database")
});


promoRouter.route('/:promoId')
.get((req,res,next) => {
    res.end("will send details of the promotion.... "+req.params.promoId + ' to you.');
})
.post((req,res,next) => {
    res.statusCode = 403;
    res.end("POST operation not supported... /dishes/" + req.params.promoId);
})
.put((req,res,next) => {
    res.write("updating the promotion " + req.params.promoId);
    res.end("\nThis will update the promotion: " + req.body.name + ' with details: ' + req.body.description);
})
.delete((req,res,next) => {
    res.end("Deleting promotion: ...." + req.params.promoId);
});


// module.exports = dishIdRouter;

module.exports = promoRouter;

