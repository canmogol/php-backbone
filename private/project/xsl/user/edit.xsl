<xsl:stylesheet version="1.0"
	xmlns:xsl="http://www.w3.org/1999/XSL/Transform"
	xmlns:pre="http://www.generated-content.com/xsl/process">
<xsl:output method="xml" encoding="utf-8" indent="no" omit-xml-declaration="no" media-type="application/xhtml+xml"/>
<xsl:template match="/root">


<div id="editContainer" class="editContainer">
<xsl:for-each select="user">
<span class="title">Update</span>
<form action="?stack=user&amp;action=user&amp;method=update" method="POST">
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
</xsl:for-each>

</div>
</xsl:template>
</xsl:stylesheet>
