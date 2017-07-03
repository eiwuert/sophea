		<!-- sidebar menu: : style can be found in sidebar.less -->
			<ul class="sidebar-menu">

			<?php
				//if(@$per_receptionist == '1'){
					echo '<li class="'.@$ac_patients.@$ac_viewall.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-user"></i> <span> '.@$h_receptionist.' </span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						//if(@$per_patients == '1' || @$per_visitors == '1'){
							echo '<ul class="treeview-menu">';
								//if($per_patients == '1'){
									echo '<li class="'.@$ac_patients.'">';
										echo '<a href="'.$base_url.'index.php/patients"><i class="fa fa-circle-o text-aqua"></i> '.@$h_patient.' </a>';
									echo '</li>';
								//}
								//if($per_visitors == '1'){
									echo '<li class="'.@$ac_viewall.'">';
										echo '<a href="'.$base_url.'index.php/patients/visited"><i class="fa fa-circle-o text-aqua"></i> View All </a>';
									echo '</li>';
								//}
							echo '</ul>';
						//}
					echo '</li>';
				//}
				//if(@$per_clinicals == '1'){
					echo '<li class="'.@$ac_diagnostics.@ac_neonatal.@$ac_ipds.@$ac_visitors.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-user-md"></i> <span> '.@$h_clinical.' </span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						//if($per_visitors == '1' || $per_diagnostics == '1' || $per_ipds == '1'){
							echo '<ul class="treeview-menu">';
								echo '<li class="'.@$ac_visitors.'">';
									echo '<a href="'.$base_url.'index.php/visitors"><i class="fa fa-circle-o text-aqua"></i> '.@$h_visitor.' </a>';
								echo '</li>';

                echo '<li class="'.@$ac_neonatal.'">';
                echo '<a href="'.$base_url.'index.php/neonatals"><i class="fa fa-circle-o text-aqua"></i> <span>'.@$h_neonatal_add.'</span> </a>';
                echo '</li>';

								echo '<li class="'.@$ac_diagnostics.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics"><i class="fa fa-circle-o text-aqua"></i> '.@$h_diagnostic.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_ipds.'">';
									echo '<a href="'.$base_url.'index.php/ipds"><i class="fa fa-circle-o text-aqua"></i> '.@$h_ipd.' </a>';
								echo '</li>';

							echo '</ul>';
						//}
					echo '</li>';
				//}

				//if(@$per_opd_adults == '1'){
					echo '<li class="'.@$ac_opd_adults.@$ac_opd_adults.@$ac_opd_adults.@$ac_opd_adults.@$ac_opd_adults.@$ac_opd_adults.@$ac_opd_adults.@$ac_opd_adults.@$ac_opd_adults.@$ac_opd_adults.@$ac_opd_adults.@$ac_opd_adults.@$ac_opd_adults.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-user-md"></i> <span> '.@$h_opd_adults.' </span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						//if($neo == '1' || $neo_icu == '1' || $neo_labo == '1'|| $neo_labo == '1'){
							echo '<ul class="treeview-menu">';

								echo '<li class="'.@$ac_o_ob.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_ob"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_ob.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_gen_med.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_gen_med"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_gen_med.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_servical_cancer_screening.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_servical_cancer_screening"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_servical_cancer_screening.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_cardio.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_cardio"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_cardio.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_eye.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_eye"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_eye.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_pulmonaire.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_pulmonaire"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_pulmonaire.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_trauma.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_trauma"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_trauma.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_renal.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_renal"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_renal.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_maternity.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_maternity"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_maternity.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_medicine.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_medicine"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_medicine.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_gyn.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_gyn"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_gyn.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_surgery.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_surgery"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_surgery.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_infertility.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_infertility"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_infertility.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_orl.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_orl"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_orl.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_ent.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_ent"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_ent.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_dermatology.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_dermatology"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_dermatology.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_bone.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_bone"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_bone.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_digestive.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_digestive"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_digestive.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_cardiaque.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_cardiaque"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_cardiaque.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_opd_others.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_opd_others"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_opd_others.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_o_icu.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/o_icu"><i class="fa fa-circle-o text-aqua"></i> '.@$h_o_icu.' </a>';
								echo '</li>';
							echo '</ul>';
						//}
					echo '</li>';
				//}
				//if(@$per_opd_adults == '1'){
					echo '<li class="'.@$ac_i_delivery_normal.@$ac_i_c_section.@$ac_i_delivery_complication.@$ac_i_maternity.@$ac_i_medicine.@$ac_i_gyn.@$ac_i_surgery.@$ac_i_infertility.@$ac_i_orl.@$ac_i_ent.@$ac_i_dermatology.@$ac_i_bone.@$ac_i_digestive.@$ac_i_cardiaque.@$ac_i_opd_others. ' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-user-md"></i> <span> '.@$h_ipd_adults.' </span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						//if($neo == '1' || $neo_icu == '1' || $neo_labo == '1'|| $neo_labo == '1'){
							echo '<ul class="treeview-menu">';
								echo '<li class="'.@$ac_i_delivery_normal.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_delivery_normal"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_delivery_normal.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_csection.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_c_section"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_c_section.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_delivery_complication.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_delivery_complication"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_delivery_complication.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_maternity.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_maternity"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_maternity.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_medicine.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_medicine"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_medicine.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_gyn.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_gyn"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_gyn.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_surgery.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_surgery"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_surgery.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_infertility.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_infertility"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_infertility.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_orl.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_orl"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_orl.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_ent.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_ent"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_ent.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_dermatology.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_dermatology"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_dermatology.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_bone.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_bone"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_bone.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_digestive.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_digestive"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_digestive.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_cardiaque.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_cardiaque"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_cardiaque.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_i_ipd_others.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_ipd_others"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_ipd_others.' </a>';
								echo '</li>';

								echo '<li class="'.@$ac_i_general_med.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_general_med"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_general_med.' </a>';
								echo '</li>';

								echo '<li class="'.@$ac_i_general_surgery.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_general_surgery"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_general_surgery.' </a>';
								echo '</li>';

								echo '<li class="'.@$ac_i_eye.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_eye"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_eye.' </a>';
								echo '</li>';

								echo '<li class="'.@$ac_i_trauma.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_trauma"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_trauma.' </a>';
								echo '</li>';

								echo '<li class="'.@$ac_i_pulmonaire.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_pulmonaire"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_pulmonaire.' </a>';
								echo '</li>';

								echo '<li class="'.@$ac_i_renal.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_renal"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_renal.' </a>';
								echo '</li>';

								echo '<li class="'.@$ac_i_icu.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_icu"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_icu.' </a>';
								echo '</li>';

								echo '<li class="'.@$ac_i_icu_ob.'">';
									echo '<a href="'.$base_url.'index.php/ipds/i_icu_ob"><i class="fa fa-circle-o text-aqua"></i> '.@$h_i_icu_ob.' </a>';
								echo '</li>';
							echo '</ul>';
						//}
					echo '</li>';
				//}
				// //if(@$per_adults == '1'){
				// 	echo '<li class="'.@$ac_parmacy.@$ac_echo_ovaries.@$ac_echoMaternity.@$ac_obExamine.@$ac_echoOther.@$ac_anc.@$ac_ivg.@$ac_perine.' treeview">';
				// 		echo '<a href="#">';
				// 			echo '<i class="fa fa-user-md"></i> <span> '.@$h_adults.' </span> <i class="fa fa-angle-left pull-right"></i>';
				// 		echo '</a>';
				// 		//if($neo == '1' || $neo_icu == '1' || $neo_labo == '1'|| $neo_labo == '1'){
				// 			echo '<ul class="treeview-menu">';
				// 				echo '<li class="'.@$ac_parmacy.'">';
				// 					echo '<a href="'.$base_url.'index.php/diagnostics/parmacy"><i class="fa fa-circle-o text-aqua"></i> '.@$h_parmacy.' </a>';
				// 				echo '</li>';
				// 				echo '<li class="'.@$ac_echo_ovaries.'">';
				// 					echo '<a href="'.$base_url.'index.php/diagnostics/echo_ovaries"><i class="fa fa-circle-o text-aqua"></i> '.@$h_echo_ovaries.' </a>';
				// 				echo '</li>';
				// 				echo '<li class="'.@$ac_echoMaternity.'">';
				// 					echo '<a href="'.$base_url.'index.php/diagnostics/echoMaternity"><i class="fa fa-circle-o text-aqua"></i> '.@$h_echoMaternity.' </a>';
				// 				echo '</li>';
				// 				echo '<li class="'.@$ac_obExamine.'">';
				// 					echo '<a href="'.$base_url.'index.php/diagnostics/obExamine"><i class="fa fa-circle-o text-aqua"></i> '.@$h_obExamine.' </a>';
				// 				echo '</li>';
				// 				echo '<li class="'.@$ac_echoOther.'">';
				// 					echo '<a href="'.$base_url.'index.php/diagnostics/echoOther"><i class="fa fa-circle-o text-aqua"></i> '.@$h_echoOther.' </a>';
				// 				echo '</li>';
				// 				echo '<li class="'.@$ac_anc.'">';
				// 					echo '<a href="'.$base_url.'index.php/diagnostics/anc"><i class="fa fa-circle-o text-aqua"></i> '.@$h_anc.' </a>';
				// 				echo '</li>';
				// 				echo '<li class="'.@$ac_ivg.'">';
				// 					echo '<a href="'.$base_url.'index.php/diagnostics/ivg"><i class="fa fa-circle-o text-aqua"></i> '.@$h_ivg.' </a>';
				// 				echo '</li>';
				// 				echo '<li class="'.@$ac_perine.'">';
				// 					echo '<a href="'.$base_url.'index.php/diagnostics/perine"><i class="fa fa-circle-o text-aqua"></i> '.@$h_perine.' </a>';
				// 				echo '</li>';
				// 			echo '</ul>';
				// 		//}
				// 	echo '</li>';
				// //}

				//if(@$per_support_service == '1'){
					echo '<li class="'.@$ac_gastro_endoscopy.@$ac_gastro_endoscopy.@$ac_gastro_endoscopy.@$ac_gastro_endoscopy.@$ac_gastro_endoscopy.@$ac_gastro_endoscopy.@$ac_gastro_endoscopy.@$ac_gastro_endoscopy.@$ac_gastro_endoscopy.@$ac_gastro_endoscopy.@$ac_gastro_endoscopy.@$ac_gastro_endoscopy.@$ac_gastro_endoscopy.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-user-md"></i> <span> '.@$h_support_service.' </span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						//if($neo == '1' || $neo_icu == '1' || $neo_labo == '1'|| $neo_labo == '1'){
							echo '<ul class="treeview-menu">';
									echo '<li class="'.@$ac_labo.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/labo"><i class="fa fa-circle-o text-aqua"></i> '.@$h_labo.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_xray.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/xray"><i class="fa fa-circle-o text-aqua"></i> '.@$h_xray.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_ctscan.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/ctscan"><i class="fa fa-circle-o text-aqua"></i> '.@$h_ctscan.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_anapat.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/anapat"><i class="fa fa-circle-o text-aqua"></i> '.@$h_anapat.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_hpv.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/hpv"><i class="fa fa-circle-o text-aqua"></i> '.@$h_hpv.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_colpo.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/colpo"><i class="fa fa-circle-o text-aqua"></i> '.@$h_colpo.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_thinprep.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/thinprep"><i class="fa fa-circle-o text-aqua"></i> '.@$h_thinprep.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_papsmear.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/papsmear"><i class="fa fa-circle-o text-aqua"></i> '.@$h_papsmear.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_x_ray_overay.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/x_ray_overay"><i class="fa fa-circle-o text-aqua"></i> '.@$h_x_ray_overay.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_dna.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/dna"><i class="fa fa-circle-o text-aqua"></i> '.@$h_dna.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_ecg.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/ecg"><i class="fa fa-circle-o text-aqua"></i> '.@$h_ecg.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_gastro_endoscopy.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/gastro_endoscopy"><i class="fa fa-circle-o text-aqua"></i> '.@$h_gastro_endoscopy.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_other_support_service.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/other_support_service"><i class="fa fa-circle-o text-aqua"></i> '.@$h_other_support_service.' </a>';
									echo '</li>';
							echo '</ul>';
						//}
					echo '</li>';
				//}

				//if(@$per_eco == '1'){
					echo '<li class="'.@$ac_echo_anc.@$ac_echo_neo_cardio.@$ac_other_adult_echo.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-user-md"></i> <span> '.@$h_eco.' </span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						//if($neo == '1' || $neo_icu == '1' || $neo_labo == '1'|| $neo_labo == '1'){
							echo '<ul class="treeview-menu">';
									echo '<li class="'.@$ac_echo_anc.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/echo_anc"><i class="fa fa-circle-o text-aqua"></i> '.@$h_echo_anc.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_echo_neo_cardio.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/echo_neo_cardio"><i class="fa fa-circle-o text-aqua"></i> '.@$h_echo_neo_cardio.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_other_adult_echo.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/other_adult_echo"><i class="fa fa-circle-o text-aqua"></i> '.@$h_other_adult_echo.' </a>';
									echo '</li>';
							echo '</ul>';
						//}
					echo '</li>';
				//}

				//if(@$per_eco == '1'){
					echo '<li class="'.@$ac_b_opd_booking.@$ac_b_ipd_booking.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-user-md"></i> <span> '.@$h_booking.' </span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						//if($neo == '1' || $neo_icu == '1' || $neo_labo == '1'|| $neo_labo == '1'){
							echo '<ul class="treeview-menu">';
									echo '<li class="'.@$ac_b_opd_booking.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/b_opd_booking"><i class="fa fa-circle-o text-aqua"></i> '.@$h_b_opd_booking.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_b_ipd_booking.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/b_ipd_booking"><i class="fa fa-circle-o text-aqua"></i> '.@$h_b_ipd_booking.' </a>';
									echo '</li>';
							echo '</ul>';
						//}
					echo '</li>';
				//}

				//if(@$per_service == '1'){
					echo '<li class="'.@$ac_s_examen.@$ac_s_perine.@$ac_s_ivg_igm.@$ac_s_anc_cpn.@$ac_s_miscarrage.@$ac_s_medicine_abortion.@$ac_s_vpi_vaccination.@$ac_s_neo_labo.@$ac_s_bone_test.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-user-md"></i> <span> '.@$h_service.' </span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						//if($neo == '1' || $neo_icu == '1' || $neo_labo == '1'|| $neo_labo == '1'){
							echo '<ul class="treeview-menu">';
									echo '<li class="'.@$ac_s_examen.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/s_examen"><i class="fa fa-circle-o text-aqua"></i> '.@$h_s_examen.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_s_perine.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/s_perine"><i class="fa fa-circle-o text-aqua"></i> '.@$h_s_perine.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_s_ivg_igm.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/s_ivg_igm"><i class="fa fa-circle-o text-aqua"></i> '.@$h_s_ivg_igm.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_s_anc_cpn.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/s_anc_cpn"><i class="fa fa-circle-o text-aqua"></i> '.@$h_s_anc_cpn.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_s_miscarrage.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/s_miscarrage"><i class="fa fa-circle-o text-aqua"></i> '.@$h_s_miscarrage.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_s_medicine_abortion.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/s_medicine_abortion"><i class="fa fa-circle-o text-aqua"></i> '.@$h_s_medicine_abortion.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_s_vpi_vaccination.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/s_vpi_vaccination"><i class="fa fa-circle-o text-aqua"></i> '.@$h_s_vpi_vaccination.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_s_neo_labo.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/s_neo_labo"><i class="fa fa-circle-o text-aqua"></i> '.@$h_s_neo_labo.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_s_bone_test.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/s_bone_test"><i class="fa fa-circle-o text-aqua"></i> '.@$h_s_bone_test.' </a>';
									echo '</li>';


							echo '</ul>';
						//}
					echo '</li>';
				//}
				//if(@$per_trashs == '1'){
					echo '<li class="'.@$ac_p_pharmacy.' treeview">';
						echo '<a href="'.$base_url.'index.php/diagnostics/p_pharmacy">';
							echo '<i class="fa fa-trash-o"></i> <span>'.@$h_p_pharmacy.'</span>';
						echo '</a>';
					echo '</li>';
				//}
                //if(@$per_service == '1'){
					echo '<li class="'.@$ac_pe_opd_ped.@$ac_pe_ped_ipd.@$ac_pe_ped_frencectomy.@$ac_pe_ped_circumcision.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-user-md"></i> <span> '.@$h_pediatric.' </span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						//if($neo == '1' || $neo_icu == '1' || $neo_labo == '1'|| $neo_labo == '1'){
							echo '<ul class="treeview-menu">';
									echo '<li class="'.@$ac_pe_opd_ped.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/pe_opd_ped"><i class="fa fa-circle-o text-aqua"></i> '.@$h_pe_opd_ped.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_pe_ped_ipd.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/pe_ped_ipd"><i class="fa fa-circle-o text-aqua"></i> '.@$h_pe_ped_ipd.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_pe_ped_frencectomy.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/pe_ped_frencectomy"><i class="fa fa-circle-o text-aqua"></i> '.@$h_pe_ped_frencectomy.' </a>';
									echo '</li>';
									echo '<li class="'.@$ac_pe_ped_circumcision.'">';
										echo '<a href="'.$base_url.'index.php/diagnostics/pe_ped_circumcision"><i class="fa fa-circle-o text-aqua"></i> '.@$h_pe_ped_circumcision.' </a>';
									echo '</li>';
							echo '</ul>';
						//}
					echo '</li>';
				//}

                //if(@$per_neo == '1'){
					echo '<li class="'.@$ac_p_chNeoOpd.@$ac_p_chNeoSimpleIcu.@$ac_p_chNeoComplicatedIcu.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-user-md"></i> <span> '.@$h_neo.' </span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						//if($neo == '1' || $neo_icu == '1' || $neo_labo == '1'|| $neo_labo == '1'){
							echo '<ul class="treeview-menu">';
								echo '<li class="'.@$ac_p_chNeoOpd.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/p_chNeoOpd"><i class="fa fa-circle-o text-aqua"></i> '.@$h_p_chNeoOpd.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_p_chNeoSimpleIcu.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/p_chNeoSimpleIcu"><i class="fa fa-circle-o text-aqua"></i> '.@$h_p_chNeoSimpleIcu.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_p_chNeoComplicatedIcu.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/p_chNeoComplicatedIcu"><i class="fa fa-circle-o text-aqua"></i> '.@$h_p_chNeoComplicatedIcu.' </a>';
								echo '</li>';
							echo '</ul>';
						//}
					echo '</li>';
				//}


                // //if(@$per_ob_examine == '1'){
                // echo '<li class=" '.@$ac_ob_examine.' treeview">';
                // echo '<a href="'.$base_url.'index.php/ob_examine">';
                // echo '<i class="fa fa-opencart"></i> <span> '.@h_ob_examine.' </span>';
                // echo '</a>';
                // echo '</li>';
                // //}

                // //if(@$per_echo_other == '1'){
                // echo '<li class=" '.@$ac_echo_other.' treeview">';
                // echo '<a href="'.$base_url.'index.php/eco_other">';
                // echo '<i class="fa fa-opencart"></i> <span> '.@h_echo_other.' </span>';
                // echo '</a>';
                // echo '</li>';
                // //}

                // //if(@$per_anc == '1'){
                // echo '<li class=" '.@$ac_anc.' treeview">';
                // echo '<a href="'.$base_url.'index.php/anc">';
                // echo '<i class="fa fa-opencart"></i> <span> '.@h_anc.' </span>';
                // echo '</a>';
                // echo '</li>';
                // //}
                // //if(@$per_labo == '1'){
                //     echo '<li class=" '.@$ac_labo.' treeview">';
                //     echo '<a href="'.$base_url.'index.php/labo">';
                //     echo '<i class="fa fa-opencart"></i> <span> '.@h_labo.' </span>';
                //     echo '</a>';
                //     echo '</li>';
                // //}

              	//if(@$per_neo == '1'){
					echo '<li class="'.@$ac_p_chNeoOpd.@$ac_p_chNeoSimpleIcu.@$ac_p_chNeoComplicatedIcu.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-user-md"></i> <span> '.@$h_neonatal.' </span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						//if($neo == '1' || $neo_icu == '1' || $neo_labo == '1'|| $neo_labo == '1'){
							echo '<ul class="treeview-menu">';
								echo '<li class="'.@$ac_p_chNeoOpd.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/n_chNeoOpd"><i class="fa fa-circle-o text-aqua"></i> '.@$h_p_chNeoOpd.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_p_chNeoSimpleIcu.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/n_chNeoSimpleIcu"><i class="fa fa-circle-o text-aqua"></i> '.@$h_p_chNeoSimpleIcu.' </a>';
								echo '</li>';
								echo '<li class="'.@$ac_p_chNeoComplicatedIcu.'">';
									echo '<a href="'.$base_url.'index.php/diagnostics/n_chNeoComplicatedIcu"><i class="fa fa-circle-o text-aqua"></i> '.@$h_p_chNeoComplicatedIcu.' </a>';
								echo '</li>';
							echo '</ul>';
						//}
					echo '</li>';
				//}

				//if(@$per_products_and_services == '1'){
					echo '<li class=" '.@$ac_categories.@$ac_types.@$ac_products.@$ac_units.@$ac_icd10s.@$ac_wards.@$ac_room.@$ac_patient_rooms.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-tags"></i> <span>'.@$h_product_and_service.'</span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						echo '<ul class="treeview-menu">';
							echo '<li class="'.@$ac_products.'">';
								echo '<a href="'.$base_url.'index.php/products"><i class="fa fa-circle-o text-aqua"></i> '.@$h_product.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_categories.'">';
								echo '<a href="'.$base_url.'index.php/categories"><i class="fa fa-circle-o text-aqua"></i> '.@$h_category.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_types.'">';
								echo '<a href="'.$base_url.'index.php/types"><i class="fa fa-circle-o text-aqua"></i> '.@$h_type.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_units.'">';
								echo '<a href="'.$base_url.'index.php/units"><i class="fa fa-circle-o text-aqua"></i> '.@$h_unit.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_icd10s.'">';
								echo '<a href="'.$base_url.'index.php/icd10s"><i class="fa fa-circle-o text-aqua"></i> '.@$h_icd10.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_wards.'">';
								echo '<a href="'.$base_url.'index.php/wards"><i class="fa fa-circle-o text-aqua"></i> '.@$h_ward.' </a>';
							echo '</li>';

							echo '<li class=" '.@$ac_room.' treeview">';
								echo '<a href="'.$base_url.'index.php/rooms">';
									echo '<i class="fa fa-star"></i> <span> '.@$h_rooms.' </span>';
								echo '</a>';
							echo '</li>';
							echo '<li class=" '.@$ac_patient_rooms.' treeview">';
								echo '<a href="'.$base_url.'index.php/patient_rooms">';
									echo '<i class="fa fa-star"></i> <span> '.@$h_patient_rooms.' </span>';
								echo '</a>';
							echo '</li>';
						echo '</ul>';
					echo '</li>';
				//}

				//if(@$per_waitting == '1'){
					echo '<li class=" '.@$ac_waitting.@$ac_waitting_history.@$ac_waitting_list.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-tags"></i> <span>'.@$h_waitting.'</span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						echo '<ul class="treeview-menu">';
							//
							echo '<li class=" '.@$ac_waitting.' treeview">';
								echo '<a href="'.$base_url.'index.php/waittings">';
									echo '<i class="fa fa-star"></i> <span> '.@$h_waitting.' </span>';
								echo '</a>';
							echo '</li>';
							echo '<li class=" '.@$ac_waitting_history.' treeview">';
								echo '<a href="'.$base_url.'index.php/waittings/history">';
									echo '<i class="fa fa-star"></i> <span> '.@$h_waitting_history.' </span>';
								echo '</a>';
							echo '</li>';
							echo '<li class=" '.@$ac_waitting_list.' treeview">';
								echo '<a href="'.$base_url.'index.php/waittings_list">';
									echo '<i class="fa fa-star"></i> <span> '.@$h_waitting_list.' </span>';
								echo '</a>';
							echo '</li>';
							//
						echo '</ul>';
					echo '</li>';
				//}
				//if(@$per_appoinment == '1'){
					echo '<li class=" '.@$ac_appoinment.' treeview">';
						echo '<a href="'.$base_url.'index.php/appoinments">';
							echo '<i class="fa fa-opencart"></i> <span> '.@$h_appoinment.' </span>';
						echo '</a>';
					echo '</li>';
				//}
				//if(@$per_workstation == '1'){
					echo '<li class=" '.@$ac_workstation.' treeview">';
						echo '<a href="'.$base_url.'index.php/WorkStations">';
							echo '<i class="fa fa-star"></i> <span> '.@$h_workstation.' </span>';
						echo '</a>';
					echo '</li>';
				//}




				//if(@$per_payments == '1'){
					echo '<li class=" '.@$ac_payments.' treeview">';
						echo '<a href="'.$base_url.'index.php/pharmacies">';
							echo '<i class="fa fa-opencart"></i> <span> '.@$h_payment.' </span>';
						echo '</a>';
					echo '</li>';
				//}
				//if($per_reports == 'true'){
					echo '<li class="'.@$ac_reports.' treeview">';
						echo '<a href="'.$base_url.'index.php/reports">';
							echo '<i class="fa fa-hospital-o"></i> <span>'.@$h_report.'</span>';
						echo '</a>';
					echo '</li>';
				//}
				//if(@$per_trashs == '1'){
					echo '<li class="'.@$ac_trashs.' treeview">';
						echo '<a href="'.$base_url.'index.php/trashs">';
							echo '<i class="fa fa-trash-o"></i> <span>'.@$h_trash.'</span>';
						echo '</a>';
					echo '</li>';
				//}
				//if(@$per_admins == '1'){
					echo '<li class="'.@$ac_users.@$ac_roles.@$ac_settings.' treeview">';
						echo '<a href="#">';
							echo '<i class="fa fa-cog"></i> <span>'.@$h_admin.'</span> <i class="fa fa-angle-left pull-right"></i>';
						echo '</a>';
						echo '<ul class="treeview-menu">';
							echo '<li class="'.@$ac_users.'">';
								echo '<a href="'.$base_url.'index.php/users"><i class="fa fa-circle-o text-aqua"></i> '.@$h_user.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_roles.'">';
								echo '<a href="'.$base_url.'index.php/roles"><i class="fa fa-circle-o text-aqua"></i> '.@$h_role.' </a>';
							echo '</li>';
							echo '<li class="'.@$ac_settings.'">';
								echo '<a href="'.$base_url.'index.php/settings"><i class="fa fa-circle-o text-red"></i> '.@$h_hospital_config.' </a>';
							echo '</li>';
						echo '</ul>';
					echo '</li>';
				//}

			?>
				<!--<li class="header">LABELS</li>
				<li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
				<li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
				<li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>-->
			  </ul>
			</section>
			<!-- /.sidebar -->
		  </aside>
