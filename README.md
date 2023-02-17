# Scanning Web Service for Equalify
This simple web service will scan of a given URL, outputting compliance errors.

## Requirements
You must have [axe-core cli](https://www.npmjs.com/package/@axe-core/cli) and its dependencies running on your web server. PHP 7+ must also be installed.

## Setup on Linux
After you setup a LEMP web server..
1. [Install node and npm](https://www.digitalocean.com/community/tutorials/how-to-install-node-js-on-ubuntu-20-04).
2. [Install Selenium and dependencies](https://towardsdatascience.com/how-to-setup-selenium-on-a-linux-vm-cd19ee47d922) - note: when installing chromdriver, you'll need to install the [latest version](https://chromedriver.chromium.org/downloads)
3. [Install axe-cli](https://www.npmjs.com/package/@axe-core/cli).
4. Start chromedriver: `chromedriver --port=4444`.
5. Add [axe-equalify](https://github.com/bbertucc/axe-equalify) wherever you want to run the web service.
6. Run `[yourdomain]/?url=[yoururl]`, replacing `[yourdomain]` and `[yoururl]`. You should see an output of axe.

## Additional Notes
- axe-core kept saying that I had the wrong version of chromedriver installed. I had the correct version. I had to add the flag `--chromedriver-path /usr/local/bin/chromedriver` to the axe-core call.
- axe-core had an error related to the chromedriver sanbox settings. I had to add `--chrome-options="no-sandbox` to the axe-core call.
