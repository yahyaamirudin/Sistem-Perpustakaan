<?php
            $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
            $pdf->SetTitle('Daftar Buku Perpustakaan Kampus');
            $pdf->SetHeaderMargin(30);
            $pdf->SetTopMargin(20);
            $pdf->setFooterMargin(20);
            $pdf->SetAutoPageBreak(true);
            $pdf->SetAuthor('Author');
            $pdf->SetDisplayMode('real', 'default');
            $pdf->AddPage();
            $i=0;
            $html='<h3>Daftar Buku</h3>
                    <table cellspacing="1" bgcolor="#666666" cellpadding="2">
                        <tr bgcolor="#ffffff">
                            <th width="5%" align="center">No</th>
                            <th width="18%" align="center">Judul</th>
                            <th width="20%" align="center">Pengarang</th>
                            <th width="15%" align="center">Penerbit</th>
                            <th width="13%" align="center">ISBN</th>
                            <th width="10%" align="center">Tahun Terbit</th>
                            <th width="15%" align="center">Tanggal Input</th>
                        </tr>';
            foreach ($buku as $row) 
                {
                    $i++;
                    $html.='<tr bgcolor="#ffffff">
                            <td align="center">'.$i.'</td>
                            <td>'.$row['judul'].'</td>
                            <td>'.$row['pengarang'].'</td>
                            <td>'.$row['penerbit'].'</td>
                            <td>'.$row['isbn'].'</td>
                            <td>'.$row['tahun_terbit'].'</td>
                            <td>'.$row['tgl_input'].'</td>
                        </tr>';
                }
            $html.='</table>';
            $pdf->writeHTML($html, true, false, true, false, '');
            $pdf->Output('daftar_produk.pdf', 'I');
?>