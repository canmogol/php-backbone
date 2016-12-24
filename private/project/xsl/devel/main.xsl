<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform" xmlns:pre="http://www.generated-content.com/xsl/process">
    <xsl:output encoding="utf-8"/>
    <xsl:template match="/root">
        <div>
            <xsl:value-of select="/root/development/current_node/table_name"/>
        </div>
    </xsl:template>
</xsl:stylesheet>
