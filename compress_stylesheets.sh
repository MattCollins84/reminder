#!/bin/bash
cat  ./date_css/bootstrap.css ./css/pratt.css ./css/pricing.css ./css/custom.css > blob.css

./minify_css.php blob.css > ./css/schedulesms.css
rm blob.css
