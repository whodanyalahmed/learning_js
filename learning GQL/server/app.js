const graphqlHTTP = require('express-graphql');
const app = require('express');



app.use('/graphql',graphqlHTTP({
    
}));
app.listen(4000,function() {
        console.log('listening request on port 4000');
    });