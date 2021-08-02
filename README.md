# 📌 Meeting Point
Using HTML5's geolocation feature to help navigate to a meeting point in unfamiliar places.

## :eyes: About
Set a pair of geocoordinates as a virtual beacon for members of your travel party to find their way back if they become lost. 

## :books: Background
I am a teacher. I have been fortunate enough to lead a few groups on trips both around the country and abroad. Often on these trips, the group is given free time to explore a tourist location. The guide brings the group to a meeting point  and state something like, "Meet back here in 20 minutes." 

Most of these meeting points are landmarks without specific addresses.

Thankfully everyone on my trips has found their way back to the meeting point on time thus far. But what if eventually someone gets lost?
With so many modern ways of communicating, it's likely this tool wouldn't be necessary. I wanted to implement it anyway - for learning!

## :map: Details
### Hypothetical scenarios
- A few members of your group wander off without paying particular attention to the details of the meeting point and time.
- The meeting point has to change at the last minute.
- General directions can be difficult, coordinates are specific.
- Helps avoid groupthink/memory. Everyone can see the correct meeting place/time with a quick web hit on their device.
- Wait, which way was that statue again?!

### Limitations
- Members of your group need internet access in the field. This can be difficult in remote and/or foreign locations.
- Uses Google Maps for directions. Some may take issue with that due to privacy concerns.
- Requires SSL (https://) to get/set coordinates. This is an HTML5 requirement.

## :eyes: Usage
Leader or designated group members can set the next meeting point by using set.html.
The demo password is "helloworld" and can easily be changed by placing the SHA-256 hash of the desired password in the pwh.txt file.

Group members visit the main page (index.php) to see the meeting point and are provided a link to directions from Google Maps from their location.
The default travel mode is set to walking. A countdown to the meeting time is provided.

**Development Note**: Timezones are not yet implemented. This will count from **server time**. 

## :warning: Disclaimer
This is a hobby project and a proof of concept. It should not be used in any real-world scenarios.  

## :mega: Credits
- [W3 Schools](https://w3schools.com) for having a fantastic free resource to learn these core concepts.
