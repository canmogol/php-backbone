<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:pre="http://www.generated-content.com/xsl/process">
<xsl:output method="xml" encoding="utf-8" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml"/>
<xsl:template match="/root">


<div id="entryContainer" class="entryContainer">
<form action="?stack=user&amp;action=user&amp;method=insert" method="POST">
<table>
	<tbody>
	
	<tr>
		<td>
			id:
		</td>
		<td>
			<input type="text" name="id" value="{id}"/>
		</td>
	</tr>
	<tr>
		<td>
			user_name:
		</td>
		<td>
			<input type="text" name="user_name" value="{user_name}"/>
		</td>
	</tr>
	<tr>
		<td>
			password:
		</td>
		<td>
			<input type="text" name="password" value="{password}"/>
		</td>
	</tr>
	<tr>
		<td>
			session_id:
		</td>
		<td>
			<input type="text" name="session_id" value="{session_id}"/>
		</td>
	</tr>
	<tr>
		<td>
			remote_address:
		</td>
		<td>
			<input type="text" name="remote_address" value="{remote_address}"/>
		</td>
	</tr>
	<tr>
		<td>
			session_last_update:
		</td>
		<td>
			<input type="text" name="session_last_update" value="{session_last_update}"/>
		</td>
	</tr>
	<tr>
		<td>
			
		</td>
		<td>
			<input type="submit" name="submitbutton" value="Ok"/>
		</td>
	</tr>
	</tbody>
</table>
</form>
</div>

<div class="listingContainer">

<table>
	<thead>
	<tr>
		<td>
			<a href="?stack=user&amp;action=user&amp;method=lists&amp;orderSelection=id&amp;">id</a>
		</td>
		<td>
			<a href="?stack=user&amp;action=user&amp;method=lists&amp;orderSelection=user_name&amp;">user_name</a>
		</td>
		<td>
			<a href="?stack=user&amp;action=user&amp;method=lists&amp;orderSelection=password&amp;">password</a>
		</td>
		<td>
			<a href="?stack=user&amp;action=user&amp;method=lists&amp;orderSelection=session_id&amp;">session_id</a>
		</td>
		<td>
			<a href="?stack=user&amp;action=user&amp;method=lists&amp;orderSelection=remote_address&amp;">remote_address</a>
		</td>
		<td>
			<a href="?stack=user&amp;action=user&amp;method=lists&amp;orderSelection=session_last_update&amp;">session_last_update</a>
		</td>
		<td>
		</td>
	</tr>
	</thead>
	<tbody>
	<xsl:for-each select="users/user">
	<xsl:choose>
	<xsl:when test="position() mod 2 = 0 ">
	
	<tr class="bg1">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			<xsl:value-of select="user_name" />
		</td>
		<td>
			<xsl:value-of select="password" />
		</td>
		<td>
			<xsl:value-of select="session_id" />
		</td>
		<td>
			<xsl:value-of select="remote_address" />
		</td>
		<td>
			<xsl:value-of select="session_last_update" />
		</td>
		<td>
			<a href="?stack=user&amp;action=user&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=user&amp;action=user&amp;method=delete&amp;id={id}">Delete</a>
		</td>
	</tr>
	
	</xsl:when>
	<xsl:otherwise>
	<tr class="bg0">
	
		<td>
			<xsl:value-of select="id" />
		</td>
		<td>
			<xsl:value-of select="user_name" />
		</td>
		<td>
			<xsl:value-of select="password" />
		</td>
		<td>
			<xsl:value-of select="session_id" />
		</td>
		<td>
			<xsl:value-of select="remote_address" />
		</td>
		<td>
			<xsl:value-of select="session_last_update" />
		</td>
		<td>
			<a href="?stack=user&amp;action=user&amp;method=edit&amp;id={id}">Update</a>
			&#160;
			<a href="?stack=user&amp;action=user&amp;method=delete&amp;id={id}">Delete</a>
		</td>
	</tr>
	</xsl:otherwise>
	</xsl:choose>
	
	</xsl:for-each>
	</tbody>
</table>
</div>
</xsl:template>
</xsl:stylesheet>
