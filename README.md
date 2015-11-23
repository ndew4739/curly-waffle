# curly-waffle
Code for timestable game cleaned: 7 files are now compressed into one (ttupdate.js)
Next step: do the same for MySQL processing files; currently have 7 (yearfourlevelfourpost.php and yearthreelevelone.php are examples), need to compress into one.
Issues: year 3 lists are a different size to year four, so have different INSERT commands. Also, need to read ttlevel from MySQL directly instead of via cookie, may need to pass from game (ttupdate.js) to processing file as part of json array.
After that: create visual array to match timestable sum (eg 7 x 6 produces 7x6 array of small dots)
