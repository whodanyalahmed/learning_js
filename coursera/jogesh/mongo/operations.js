const assert = require('assert')

exports.insertDocument = (db,document,collection,callback) => {
    const call = db.collection(collection);
    call.insert(document,(err,result) => {
        assert.equal(err,null)
        console.log("Inserted : " + result.result.n + " documents are inserted into the collection " + collection)
        callback(result);
    })
};
exports.findDocument = (db,collection,callback) => {
    const call = db.collection(collection);
    call.find({}).toArray((err,docs) => {
        assert.equal(err,null)
        callback(docs);
    })
};
exports.removeDocument = (db,document,collection,callback) => {
    const call = db.collection(collection);
    call.deleteOne(document,(err,res) => {
        assert.equal(err,null);
        console.log('Removed the document : ' + document)
        callback(res);
    })
};
exports.updateDocument = (db,document,update,collection,callback) => {
    const call = db.collection(collection);
    call.updateOne(document,{$set: update},null,(err,res ) =>{
        assert.equal(err,null)
        console.log("updated the document with" , update )
        callback(res);
    })
};
