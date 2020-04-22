# API-Shift-Cipher
This API allows users to encode messages with a shift cipher.

1) Download a platform for API development, such as Postman
2) Set Headers: "Content-Type" should be set to "application/json"
3) Submit a POST request to http://localhost/api/encode/ in JSON format with two keys, "Shift" and "Message", which are an integer and string, respectively. 
Example raw JSON POST Body:
{
	"Shift": 3,
	"Message": "Love"	
}
Output: {"EncodedMessage":"Oryh"}
