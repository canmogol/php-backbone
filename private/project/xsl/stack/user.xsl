<xsl:stylesheet version="1.0"
xmlns:xsl="http://www.w3.org/1999/XSL/Transform" 
xmlns:pre="http://www.generated-content.com/xsl/process" >
<xsl:output method="xml" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml" encoding="UTF-8"/>
<xsl:template match="/root">

<div class="stackContainer">
<a href="?stack=user&amp;action=user&amp;method=lists"><span class="title">user Stack</span></a>

<br />

<pre:insert>private/project/xsl/user/edit</pre:insert>

<br />

<pre:insert>private/project/xsl/user/lists</pre:insert>

</div>
</xsl:template>
</xsl:stylesheet>