<?php
if (!isset($_SESSION['user_id'])) die("You have no permissions to access this site.");

if (isset($_GET['delete'])) {
    deleteContactRequest($_GET['delete']);
    echo '<script>  M.toast({html: \'Der Eintrag wurde erfolgreich gelöscht!\'})</script>';
}

$requests = getContactRequests(); ?>

<table class="highlight responsive-table" xmlns:mailto="http://www.w3.org/1999/xhtml">
    <thead>
    <tr>
        <th>Nachname</th>
        <th>Vorname</th>
        <th>E-Mail</th>
        <th>Content</th>
        <th class="right" colspan="3"></th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($requests as $request) { ?>
        <tr>
            <td><?php echo $request['lastname']; ?></td>
            <td><?php echo $request['firstname']; ?></td>
            <td><?php echo $request['email']; ?></td>
            <td><?php echo nl2br($request['content']); ?></td>
            <td>
                <?php
                if (isset($request['attachment']) != "")
                    echo '<a href="/file/' . $request['attachment'] . '" target="_blank"><i class="material-icons grey-text text-lighten-1">attach_file</i></a>';
                ?>
            </td>
            <td>
                <a href="mailto:<?php echo $request['email']; ?>?subject=Antwort auf Ihre Kontaktanfrage"><i class="material-icons">email</i></a>
            </td>
            <td>
                <a href="?delete=<?php echo $request['id']; ?>"><i class="material-icons red-text text-red-4">delete</i></a>
            </td>
        </tr>
    <?php } ?>
    </tbody>
</table>

<script>
    (function ($) {
        $(function () {
            $('.modal').modal(); //initialize all modals
        });
    })(jQuery);
</script>