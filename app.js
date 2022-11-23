/**
 * Module dependencies.
 */

var express = require('express');

var app = module.exports = express();

// Let's get the homepage running!

app.get('/', function(req, res){
    res.send(
        '<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><title>Equalify Axe Hosting</title></head><body><h1>Axe API Hosting by Equalify</h1><p>Equalify offers managed hosting of the Axe API.</p><p>Scan any URL for $0.01/request.</p><p><a href="mailto:blakebertuccelli@gmail.com">Email Blake</a> for more information.</p></body></html>'
    );
  });
  
// create an error with .status. we
// can then use the property in our
// custom error handler (Connect respects this prop as well)

function error(status, msg) {
  var err = new Error(msg);
  err.status = status;
  return err;
}

// if we wanted to supply more than JSON, we could
// use something similar to the content-negotiation
// example.

// here we validate the API key,
// by mounting this middleware to /api
// meaning only paths prefixed with "/api"
// will cause this middleware to be invoked

app.use('/api', function(req, res, next){
  var key = req.query['key'];

  // key isn't present
  if (!key) return next(error(400, 'api key required'));

  // key is invalid
  if (apiKeys.indexOf(key) === -1) return next(error(401, 'invalid api key'))

  // all good, store req.key for route access
  req.key = key;
  next();
});

// map of valid api keys, typically mapped to
// account info with some sort of database like redis.
// api keys do _not_ serve as authentication, merely to
// track API usage or help prevent malicious behavior etc.

var apiKeys = ['equalify'];

// these two objects will serve as our faux database

var repos = [
  { name: 'express', url: 'https://github.com/expressjs/express' },
  { name: 'stylus', url: 'https://github.com/learnboost/stylus' },
  { name: 'cluster', url: 'https://github.com/learnboost/cluster' }
];

// we now can assume the api key is valid,
// and simply expose the data

// example: http://localhost:3000/api/repos/?api-key=foo
app.get('/api', function(req, res, next){
  res.send(repos);
});

// middleware with an arity of 4 are considered
// error handling middleware. When you next(err)
// it will be passed through the defined middleware
// in order, but ONLY those with an arity of 4, ignoring
// regular middleware.
app.use(function(err, req, res, next){
  // whatever you want here, feel free to populate
  // properties on `err` to treat it differently in here.
  res.status(err.status || 500);
  res.send({ error: err.message });
});

// our custom JSON 404 middleware. Since it's placed last
// it will be the last middleware called, if all others
// invoke next() and do not respond.
app.use(function(req, res){
  res.status(404);
  res.send({ error: "Sorry, can't find that" })
});


// trying axios
const axios = require('axios');

// Make a request for a user with a given ID
axios.get('https://example.com')
  .then(function (response) {

    // handle success
    const axe = require('axe-core');
    console.log(response.data);
    
  })
  .catch(function (error) {
    // handle error
    console.log('error'+error);
  })
  .then(function () {
    // always executed
  });

/* istanbul ignore next */
if (!module.parent) {
    app.listen(3000);
    console.log('Express started on port 3000');
}  

