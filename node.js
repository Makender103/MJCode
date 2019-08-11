var http = require('http')


http.createServer(function(req, res){
	res.end("Scinnob app")
}).listen(8081)
console.log("esta rodando!")



/*const scinnob = express();


scinnob.listen(8081, function() {
	console.log("Servidor rodando!")
});*/

