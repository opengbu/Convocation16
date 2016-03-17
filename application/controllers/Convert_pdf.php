<?php

class Convert_pdf extends CI_Controller
{

    public function index()
    {
        $this->load->library('fpdf_gen');

        $query = $this->db->query("select * from users where user_id = '" . $this->input->get('user_id') . "' ");
        $row = $query->row();
        $data = $row->gender == 'male' ? "White Shirt, Black Pant, Formal Shoes, Cap, Sash" : "Cream coloured saree with golden border and cream blouse, Cap, Cape";
        //       $this->fpdf->AddPage();

        $this->fpdf->SetFont('Arial', '', 14);
// Calculate width of title and position
        $w = $this->fpdf->GetStringWidth('First Convocation 2016') + 6;
        $this->fpdf->SetX((210 - $w) / 2);
// Colors of frame, background and text
// Thickness of frame (1 mm)
// Title
        $this->fpdf->SetTextColor(220, 50, 50);
        $this->fpdf->Cell($w + 7, 11, 'First Convocation 2016', 0, 1, 'C');
// Line break
        $this->fpdf->Ln(6);


        $this->fpdf->SetTextColor(0, 0, 0);
        $this->fpdf->SetFont('Arial', '', 16);
// Calculate width of title and position
        $w = $this->fpdf->GetStringWidth('Registration  Slip') + 6;
        $this->fpdf->SetX((210 - $w) / 2);
// Colors of frame, background and text
// Thickness of frame (1 mm)
// Title
        $this->fpdf->Cell($w + 5, 11, 'Registration Slip', 0, 1, 'C');
// Line break
        $this->fpdf->Ln(10);


        $this->fpdf->SetX(40);
        $this->fpdf->SetFont('Times', '', 14);
        $this->fpdf->Cell(70, 10, "Name", 0, 0);
//$this->fpdf->SetX(20);
        $this->fpdf->SetFont('Times', '', 13);
        $this->fpdf->Cell(100, 10, $row->full_name, 0, 1);
        $this->fpdf->Ln(2);

        $this->fpdf->SetFont('Times', '', 14);
        $this->fpdf->SetX(40);
        $this->fpdf->Cell(70, 10, "Father's Name", 0, 0);
//$this->fpdf->SetX(20);
        $this->fpdf->SetFont('Times', '', 13);
        $this->fpdf->Cell(100, 10, $row->fathersName, 0, 1);
        $this->fpdf->Ln(2);

        $this->fpdf->SetFont('Times', '', 14);
        $this->fpdf->SetX(40);
        $this->fpdf->Cell(70, 10, "Roll Number", 0, 0);
//$this->fpdf->SetX(20);
        $this->fpdf->SetFont('Times', '', 13);
        $this->fpdf->Cell(100, 10, $row->roll_number, 0, 1);
        $this->fpdf->Ln(2);

        $ok = true;
        $this->fpdf->SetFont('Times', '', 14);
        $this->fpdf->SetX(40);
        $this->fpdf->Cell(70, 10, "Degree Name", 0, 0);
//$this->fpdf->SetX(20);
        $this->fpdf->SetFont('Times', '', 13);
        $this->fpdf->MultiCell(100, 10, $row->degreeName, 0, 1);
        $this->fpdf->Ln(2);


        $this->fpdf->SetFont('Times', '', 14);
        $this->fpdf->SetX(40);
        $this->fpdf->Cell(70, 10, "Passout Year", 0, 0);
//$this->fpdf->SetX(20);
        $this->fpdf->SetFont('Times', '', 13);
        $this->fpdf->Cell(100, 10, $row->year, 0, 1);
        $this->fpdf->Ln(2);


        $this->fpdf->SetFont('Times', '', 14);
        $this->fpdf->SetX(40);
        $this->fpdf->Cell(70, 10, "Company/Organization Name", 0, 0);
//$this->fpdf->SetX(20);
        $this->fpdf->SetFont('Times', '', 13);
        $this->fpdf->MultiCell(100, 10, $row->company_name, 0, 1);
        $this->fpdf->Ln(2);

        $this->fpdf->SetFont('Times', '', 14);
        $this->fpdf->SetX(40);
        $this->fpdf->Cell(70, 10, "Company/Organization Address", 0, 0);
//$this->fpdf->SetX(20);
        $this->fpdf->SetFont('Times', '', 13);
        $this->fpdf->MultiCell(100, 10, $row->company_location, 0, 1);
        $this->fpdf->Ln(2);

        $this->fpdf->SetFont('Times', '', 14);
        $this->fpdf->SetX(40);
        $this->fpdf->Cell(70, 10, "Resident Address", 0, 0);
//$this->fpdf->SetX(20);
        $this->fpdf->SetFont('Times', '', 13);
        $this->fpdf->MultiCell(100, 10, $row->address, 0, 1);
        $this->fpdf->Ln(2);


        $this->fpdf->SetFont('Times', '', 14);
        $this->fpdf->SetX(40);
        $this->fpdf->Cell(70, 10, "Email Address", 0, 0);
//$this->fpdf->SetX(20);
        $this->fpdf->SetFont('Times', '', 13);
        $this->fpdf->Cell(100, 10, $row->email, 0, 1);
        $this->fpdf->Ln(2);


        $this->fpdf->SetFont('Times', '', 14);
        $this->fpdf->SetX(40);
        $this->fpdf->Cell(70, 10, "Mobile Number", 0, 0);
//$this->fpdf->SetX(20);
        $this->fpdf->SetFont('Times', '', 13);
        $this->fpdf->Cell(100, 10, $row->phone_number, 0, 1);

        $this->fpdf->SetFont('Times', '', 14);
        $this->fpdf->SetX(40);
        $this->fpdf->Cell(70, 10, "Accomadation", 0, 0);
//$this->fpdf->SetX(20);
        $this->fpdf->SetFont('Times', '', 13);
        $this->fpdf->Cell(100, 10, $row->accomodation, 0, 1);
        $this->fpdf->Ln(2);

        $this->fpdf->SetFont('Times', '', 14);
        $this->fpdf->SetX(40);
        $this->fpdf->Cell(70, 10, "Dress Code-", 0, 0);
//$this->fpdf->SetX(20);
        $this->fpdf->SetFont('Times', '', 13);
        $this->fpdf->MultiCell(100, 10, $data, 0, 1);
        $this->fpdf->Ln(2);

        $this->fpdf->SetFont('Times', '', 14);
        $this->fpdf->SetX(40);
        $this->fpdf->Cell(70, 10, "Eligible for Gold Medal", 0, 0);
//$this->fpdf->SetX(20);
        $res= $this->db->query("select * from studentinfo where enrollmentNo='$row->roll_number'");
        $row2=$res->row();
        $this->fpdf->SetFont('Times', '', 13);
	if($res->num_rows() <1) 
		$this->fpdf->Cell(100, 10,"NO", 0, 1);
        else
		$this->fpdf->Cell(100, 10, $row2->gold==1?"YES":"NO", 0, 1);

        $this->fpdf->Ln(30);
        $this->fpdf->Output();
    }

}

?>
