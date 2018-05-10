# Stream_Sampling

 Stream Sampling  (3 Sources, CLI)
 Stream sampler that picks a random (representative) sample of size k from a stream of values with unknown and possibly very large length.
 
 Three kinds of inputs:
1. Values piped directly into the process (stdin)
2. Values generated used a good random source provided by programming language
3. Values loaded from http://www.random.org/clients/http/
 
example usage:
1. echo 'THEQUICKBROWNFOXJUMPSOVERTHELAZYDOG' | ./sample_app.php --source=stdin --length=5 

2. ./sample_app.php --source=random --length=10 

3. ./sample_app.php --source=url --length=10 