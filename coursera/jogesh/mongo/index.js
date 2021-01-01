const MongoClient = require('mongodb').MongoClient;
const assert = require('assert')
const dbopr = require('./operations')
const url = 'mongodb://localhost:27017/';
const dbname = 'conFusion';


MongoClient.connect(url,(err,client) => {
    useUnifiedTopology: true
    assert.equal(err,null);
    console.log("connected bitcch...")

    const db = client.db(dbname);
    const collection = db.collection('dishes');
    // modular method
    dbopr.insertDocument(db,{name: 'daniyal',description : 'testing'},'dishes',(result) => {
        console.log('Inserted document: \n' , result.ops);

        dbopr.findDocument(db,'dishes',(docs)=> {
            console.log("Found documents: \n" + docs)

            dbopr.updateDocument(db,{name: 'daniyal' }, {description : 'updated desc'},'dishes',(result) =>{
                console.log("Updated document: " + result.result);
                dbopr.findDocument(db,'dishes',(docs)=> {
                    console.log("Found documents: \n" + docs)
                    
                    db.dropCollection('dishes',(res) => {
                        console.log("Dropped Collection"+res);
                        client.close();
                    })
                });

            })
        })
    })



    // single method
    // collection.insertOne({'name':'DanTheDirector',"description": 'Filmmaker'},(err,result) =>{
    //     console.log('after insert: \n')
    //     console.log(result.ops);
    //     collection.find({}).toArray((err,docs) => {
    //         assert.equal(err,null);
    //         console.log('Found: \n');
    //         console.log(docs);

    //         db.dropCollection('dishes', (err,result) => {
    //             assert.equal(err,null);
    //             console.log('Droped database dishes...and closing it');
    //             client.close()
    //         })
    //     })
    // });


})