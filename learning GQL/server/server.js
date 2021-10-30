express = require('express');	
const exgraphql = require('express-graphql');
// import {graphqlHTTP} from 'express-graphql';
const app = express();
let graphqlHTTP = exgraphql.graphqlHTTP ;
import resolvers from './resolver';
import schema from '../graphql/schema';

// const {
// 	GraphQLSchema,
// 	GraphQLObjectType,
// 	GraphQLString
// 		} = require('graphql');

// const schema = new GraphQLSchema({
// 	query = new GraphQLObjectType({
// 		name : "hello! world",
// 		fields : () => ({
// 			message : { 
// 				type : GraphQLString,
// 				resolve : () => "Hello world!" 
// 			}
// 		})
// 	})
// })

// expressGraphQL = expressGraphQL();
const root = resolvers;
app.use('/graphql',graphqlHTTP ({
	schema : schema,
	rootValue : root,
	graphiql : true
}));

app.get('/', (req,res) => {
	res.send("Up and running");
});

app.listen(5000., () => console.log("Server running")  );