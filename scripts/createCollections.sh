
export PATH=/Users/ellen/Documents/mongodb/bin:$PATH
mongo
use twitterDB
db.createCollection("followers")
db.createCollection("tweets")
db.createCollection("likes")
db.createCollection("comments")
