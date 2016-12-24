<xsl:stylesheet version="1.0"
                xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
                xmlns:pre="http://www.generated-content.com/xsl/process">
    <xsl:output method="xml" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml" encoding="UTF-8"/>
    <xsl:template match="/root">

        <pre:insert>private/project/xsl/stack/<xsl:value-of select="/root/selected_stack"/>
        </pre:insert>

    </xsl:template>
</xsl:stylesheet>