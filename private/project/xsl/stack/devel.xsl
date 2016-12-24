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
                <header>
                    <pre:insert>private/project/xsl/devel/header</pre:insert>
                </header>
                <nav>
                    <pre:insert>private/project/xsl/devel/menu</pre:insert>
                </nav>
                <section>
                    <pre:insert>private/project/xsl/devel/main</pre:insert>
                </section>
                <footer>
                    <pre:insert>private/project/xsl/devel/footer</pre:insert>
                </footer>
            </body>
        </html>
    </xsl:template>

</xsl:stylesheet>