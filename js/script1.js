$(document).ready(function(){
		var decrypted = CryptoJS.AES.decrypt("U2FsdGVkX19MURu+3i5L2PUvBxM9Pf3x1X4nkqDMuAw=", "MyKey");
		decrypted = decrypted.toString(CryptoJS.enc.Utf8);
        $("div").append(decrypted);
    });