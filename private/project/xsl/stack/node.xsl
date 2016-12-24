<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
xmlns:pre="http://www.generated-content.com/xsl/process" >
<xsl:output method="xml" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml" encoding="UTF-8"/>
<xsl:template match="/root">

<div class="stackContainer">
<a href="?stack=node&amp;action=node&amp;method=lists"><span class="title">node Stack</span></a>

<br />

<pre:insert>private/project/xsl/node/edit</pre:insert>

<br />

<pre:insert>private/project/xsl/node/lists</pre:insert>

</div>
</xsl:template>
</xsl:stylesheet>