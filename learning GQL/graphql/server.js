const express = require('express');
const { graphqlHTTP } = require('express-graphql');
// const { GraphQLSchema } = require('graphql');
import { schema } from "./schema";
const app = express();

app.use(
  '/graphql',
  graphqlHTTP({
    schema: schema,
    graphiql: true,
  }),
);

app.listen(4000);