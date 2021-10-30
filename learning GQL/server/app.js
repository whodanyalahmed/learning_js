

const express = require('express');
const graphqlHTTP = require('express-graphql');

const app = express();


app.use('/graphq', graphqlHTTP({
    
}));

app.listen(4000,() =>  {
        console.log('listening request on port 4000');
});