document.getElementById("artistSubmit").addEventListener("click", function(event) {
  event.preventDefault();
  const value = document.getElementById("artistInput").value;
  if (value === "")
    return;
  console.log(value);
    const url = "http://ws.audioscrobbler.com/2.0/?method=artist.getsimilar&limit=10&artist=" + value + "&api_key=ed1e95133fb0f5ae801a5af676184bb0&format=json";
  fetch(url)
    .then(function(response) {
      return response.json();
    }).then(function(json) {
	  	let relatedArtists = json.similarartists.artist;
		let results = "";
		results += '<h2>Related Artists </h2>';
		for (let i=0; i < relatedArtists.length ; i++) 
		{
			results +=	"<div class=\"scrollmenublock\">";
			results += "<p>" + relatedArtists[i].name + "</p>" + "<br>";
			results += "<img size= \'small\' src= " + relatedArtists[i].image[1]['#text'] + ">  </img> <br>";
			results += 	"</div>";
		}
      document.getElementById("artistResults").innerHTML = results;
    });
});


