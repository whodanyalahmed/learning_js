const graphqlHTTP = require('express-graphql');


const express = require('express');

const app = express()

app.use('/graphql',graphqlHTTP({
    
}));
app.listen(4000,function() {
        console.log('listening request on port 4000');
    });