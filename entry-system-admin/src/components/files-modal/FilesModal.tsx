import React from "react";
import {
	IonModal,
	IonHeader,
	IonToolbar,
	IonTitle,
	IonContent,
	IonList,
	IonItem,
	IonButton,
} from "@ionic/react";

interface FileModalProps {
	isOpen: boolean;
	onClose: () => void;
	files: { file_name: string; file_url: string }[]; // Assuming each file has a URL
}

const FileModal: React.FC<FileModalProps> = ({ isOpen, onClose, files }) => {
	return (
		<IonModal isOpen={isOpen} onDidDismiss={onClose}>
			<IonHeader>
				<IonToolbar>
					<IonTitle>Files</IonTitle>
					<IonButton slot="end" onClick={onClose}>
						Close
					</IonButton>
				</IonToolbar>
			</IonHeader>
			<IonContent>
				<IonList>
					{files.map((file, index) => (
						<IonItem key={index}>
							<a
								href={file.file_url}
								target="_blank"
								rel="noopener noreferrer"
							>
								{file.file_name}
							</a>
						</IonItem>
					))}
				</IonList>
			</IonContent>
		</IonModal>
	);
};

export default FileModal;
