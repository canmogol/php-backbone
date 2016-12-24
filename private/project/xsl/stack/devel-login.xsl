<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:pre="http://www.generated-content.com/xsl/process">
    <xsl:output method="html" encoding="utf-8" indent="yes"/>

    <xsl:template match="/">
        <xsl:text disable-output-escaping='yes'>&lt;!DOCTYPE html></xsl:text>
        <html>
            <head>
                <title>test</title>
                <meta charset="utf-8"/>
                <link href="public/css/reset.css" rel="stylesheet" type="text/css"/>
                <link href="public/css/main.css" rel="stylesheet" type="text/css"/>
                <link href="public/css/develop.css" rel="stylesheet" type="text/css"/>
                <link href='public/css/merriweather.sans.400.700.300.800.lation.lation-ext.css' rel='stylesheet'
                      type='text/css'/>
            </head>
            <body>
                <xsl:if test="count(/root/errors)>0">
                    <div id="errorsContainer" class="appear2sec">
                        <ul>
                            <xsl:for-each select="/root/errors">
                                <li>
                                    <xsl:value-of select="."/>
                                </li>
                            </xsl:for-each>
                        </ul>
                    </div>
                </xsl:if>
                <div id="loginContainer">
                    <div id="formContainer">
                        <form action="?/_/devel-login/devel/login" method="post">
                            <fieldset>
                                <label for="username">Username:</label>
                                <input type="text" name="username" id="username" autofocus="autofocus"/>
                                <br/>
                                <label for="password">Password:</label>
                                <input type="password" name="password" id="password"/>
                                <br/>
                                <input type="submit" id="submit" value="login"/>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>