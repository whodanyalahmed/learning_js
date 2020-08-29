const express = require('express')
const bodyParser = require('body-parser')

const dishId = express.Router();

dishId.use(bodyParser.json());

dishId.route('/')
.get((req,res,next) => {
    res.end("will send details of the dishe.... "+req.params.dishID + ' to you.')
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


module.exports = dishId;