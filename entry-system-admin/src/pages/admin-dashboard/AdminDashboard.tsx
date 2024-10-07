import {
	IonButtons,
	IonContent,
	IonHeader,
	IonMenuButton,
	IonPage,
	IonTitle,
	IonList,
	IonItem,
	IonToolbar,
	IonGrid,
	IonRow,
	IonCol,
	IonInput,
	IonButton,
} from "@ionic/react";
import React, { useEffect, useState } from "react";
import EntryService from "../../services/entries/EntryService";
import { Entry } from "../../models/Entry";
import FileModal from "../../components/files-modal/FilesModal";

import "./AdminDashboard.css";

interface EntryMeta {
	entryID: number;
	author: string;
	files: any;
	category: string;
}

const AdminDashboard: React.FC = () => {
	const name = "Judge Dashboard";
	const [entries, setEntries] = useState<Entry[]>([]);
	const [entryMetas, setEntryMetas] = useState<EntryMeta[]>([]);
	const [modalOpen, setModalOpen] = useState(false);
	const [selectedFiles, setSelectedFiles] = useState<any[]>([]);

	useEffect(() => {
		EntryService.getEntries()
			.then((info: any) => {
				setEntries(info.data);

				info.data.forEach((entry: Entry) => {
					fetchEntryMeta(entry.id);
				});
			})
			.catch((error) => console.error("Error fetching entries", error));
	}, []);

	const fetchEntryMeta = async (entryID: number) => {
		try {
			const response = await EntryService.getEntryMeta(entryID);
			setEntryMetas((prevMetas) => [
				...prevMetas,
				{
					entryID: entryID,
					author: response.data.user,
					files: response.data.files,
					category: response.data.category,
				},
			]);
		} catch (error) {
			console.error(
				`Error fetching metadata for entry ${entryID}`,
				error
			);
		}
	};

	const formatDate = (dateString: string): string => {
		const options: Intl.DateTimeFormatOptions = {
			year: "numeric",
			month: "2-digit",
			day: "2-digit",
		};
		const date = new Date(dateString);
		return new Intl.DateTimeFormat("en-US", options).format(date);
	};

	const handleScoreChange = (id: number, value: number) => {
		setEntries((prevEntries) =>
			prevEntries.map((entry) =>
				entry.id === id ? { ...entry, score: value } : entry
			)
		);

		EntryService.updateEntry(value, id);
	};

	const openFileModal = (files: any[]) => {
		setSelectedFiles(files);
		setModalOpen(true);
	};

	return (
		<IonPage>
			<IonHeader>
				<IonToolbar>
					<IonButtons slot="start">
						<IonMenuButton />
					</IonButtons>
					<IonTitle>{name}</IonTitle>
				</IonToolbar>
			</IonHeader>

			<IonContent fullscreen>
				<IonHeader collapse="condense">
					<IonToolbar>
						<IonTitle size="large">{name}</IonTitle>
					</IonToolbar>
				</IonHeader>

				<div id="dashboard-container">
					<IonGrid>
						<IonRow id="grid-header">
							<IonCol>
								<strong>User</strong>
							</IonCol>
							<IonCol>
								<strong>Title</strong>
							</IonCol>
							<IonCol>
								<strong>Category</strong>
							</IonCol>
							<IonCol>
								<strong>Files</strong>
							</IonCol>
							<IonCol>
								<strong>Score</strong>
							</IonCol>
							<IonCol>
								<strong>Payment</strong>
							</IonCol>
							<IonCol>
								<strong>Date</strong>
							</IonCol>
						</IonRow>

						{entries.length > 0 ? (
							entries
								.slice()
								.reverse()
								.map((entry) => {
									const entryMeta = entryMetas.find(
										(meta) => meta.entryID === entry.id
									);

									return (
										<IonRow key={entry.id}>
											<IonCol>
												{entryMeta
													? entryMeta.author
													: ""}
											</IonCol>
											<IonCol>{entry.title}</IonCol>
											<IonCol>
												{entryMeta
													? entryMeta.category
													: ""}
											</IonCol>
											<IonCol>
												{entryMeta?.files.length > 0 ? (
													<IonButton
														onClick={() =>
															entryMeta &&
															openFileModal(
																entryMeta.files
															)
														}
													>
														View
													</IonButton>
												) : (
													""
												)}
											</IonCol>
											<IonCol>
												<IonInput
													type="number"
													value={entry.score}
													onIonChange={(e: any) =>
														handleScoreChange(
															entry.id,
															Number(
																e.detail.value!
															)
														)
													}
												/>
											</IonCol>
											<IonCol>
												{entry.payment_status
													.charAt(0)
													.toUpperCase() +
													entry.payment_status.slice(
														1
													)}{" "}
											</IonCol>
											<IonCol>
												{formatDate(entry.created_at)}
											</IonCol>
										</IonRow>
									);
								})
						) : (
							<IonItem>
								<p>No entries found</p>
							</IonItem>
						)}
					</IonGrid>
				</div>

				<FileModal
					isOpen={modalOpen}
					onClose={() => setModalOpen(false)}
					files={selectedFiles}
				/>
			</IonContent>
		</IonPage>
	);
};

export default AdminDashboard;
